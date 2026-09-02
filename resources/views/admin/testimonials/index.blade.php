@extends('admin.layout')

@section('title', 'Testimonials')
@section('kicker', 'Content')
@section('heading', 'Testimonials')

@section('content')
    <div class="ad-toolbar">
        <p>Home and Services page client quotes.</p>
        <a class="ad-btn" href="{{ route('admin.testimonials.create') }}">Add testimonial</a>
    </div>

    <div class="ad-table-wrap">
        <table class="ad-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Context</th>
                    <th>Order</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($testimonials as $testimonial)
                    <tr>
                        <td>
                            <strong>{{ $testimonial->name }}</strong>
                            <span>{{ \Illuminate\Support\Str::limit($testimonial->quote, 80) }}</span>
                        </td>
                        <td><em class="ad-pill">{{ $testimonial->context }}</em></td>
                        <td>{{ $testimonial->sort_order }}</td>
                        <td class="ad-actions">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}">Edit</a>
                            <form method="post" action="{{ route('admin.testimonials.destroy', $testimonial) }}" onsubmit="return confirm('Delete this testimonial?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">No testimonials yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @include('admin.partials.pager', ['paginator' => $testimonials])
@endsection
