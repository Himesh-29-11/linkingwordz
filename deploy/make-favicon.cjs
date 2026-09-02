const sharp = require('sharp');
const fs = require('fs');
const path = require('path');

const src = process.argv[2];
const outDir = process.argv[3];

function svgCircle(size, fill = 'white') {
  const c = size / 2;
  return Buffer.from(
    `<svg width="${size}" height="${size}" xmlns="http://www.w3.org/2000/svg"><circle cx="${c}" cy="${c}" r="${c}" fill="${fill}"/></svg>`
  );
}

function svgRing(size) {
  const c = size / 2;
  const r = c - 8;
  return Buffer.from(
    `<svg width="${size}" height="${size}" xmlns="http://www.w3.org/2000/svg"><circle cx="${c}" cy="${c}" r="${r}" fill="none" stroke="#104547" stroke-width="18"/></svg>`
  );
}

(async () => {
  const { data, info } = await sharp(src).ensureAlpha().raw().toBuffer({ resolveWithObject: true });
  const w = info.width;
  const h = info.height;
  let minX = w;
  let minY = h;
  let maxX = 0;
  let maxY = 0;
  let found = 0;
  const yMax = Math.floor(h * 0.58);

  for (let y = 0; y < yMax; y++) {
    for (let x = 0; x < w; x++) {
      const i = (y * w + x) * 4;
      const r = data[i];
      const g = data[i + 1];
      const b = data[i + 2];
      if (r < 25 && g < 25 && b < 25) continue;
      const isMauve = r > 120 && g > 90 && b > 100 && r > g;
      if (isMauve) continue;
      const isTeal = (g > r + 10 && b > r && g + b > 80) || (r < 80 && g > 40 && b > 40);
      if (!isTeal) continue;
      found++;
      if (x < minX) minX = x;
      if (y < minY) minY = y;
      if (x > maxX) maxX = x;
      if (y > maxY) maxY = y;
    }
  }

  console.log({ found, minX, minY, maxX, maxY, w, h });
  if (found < 50) throw new Error('pen not found');

  const pad = 32;
  let left = Math.max(0, minX - pad);
  let top = Math.max(0, minY - pad);
  let right = Math.min(w - 1, maxX + pad);
  let bottom = Math.min(h - 1, maxY + pad);
  let cw = right - left + 1;
  let ch = bottom - top + 1;
  const side = Math.max(cw, ch);
  left = Math.max(0, Math.min(w - side, left - Math.floor((side - cw) / 2)));
  top = Math.max(0, Math.min(h - side, top - Math.floor((side - ch) / 2)));
  cw = Math.min(side, w - left);
  ch = Math.min(side, h - top);

  const cropped = await sharp(src)
    .extract({ left, top, width: cw, height: ch })
    .ensureAlpha()
    .raw()
    .toBuffer({ resolveWithObject: true });

  const px = cropped.data;
  for (let i = 0; i < px.length; i += 4) {
    if (px[i] < 28 && px[i + 1] < 28 && px[i + 2] < 28) px[i + 3] = 0;
  }

  const transparentPen = await sharp(px, {
    raw: { width: cropped.info.width, height: cropped.info.height, channels: 4 },
  })
    .png()
    .toBuffer();

  const size = 512;
  const resizedPen = await sharp(transparentPen)
    .resize(Math.floor(size * 0.7), Math.floor(size * 0.7), {
      fit: 'contain',
      background: { r: 0, g: 0, b: 0, alpha: 0 },
    })
    .png()
    .toBuffer();

  const bg = await sharp({
    create: {
      width: size,
      height: size,
      channels: 4,
      background: { r: 245, g: 243, b: 240, alpha: 255 },
    },
  })
    .png()
    .toBuffer();

  const composed = await sharp(bg)
    .composite([{ input: resizedPen, gravity: 'centre' }])
    .png()
    .toBuffer();

  const roundedPath = path.join(outDir, 'apple-touch-icon.png');
  await sharp(composed)
    .composite([{ input: svgCircle(size), blend: 'dest-in' }])
    .composite([{ input: svgRing(size), gravity: 'centre' }])
    .png()
    .toFile(roundedPath);

  await sharp(roundedPath).resize(32, 32).png().toFile(path.join(outDir, 'favicon-32x32.png'));
  await sharp(roundedPath).resize(16, 16).png().toFile(path.join(outDir, 'favicon-16x16.png'));
  await sharp(roundedPath).resize(48, 48).png().toFile(path.join(outDir, 'favicon.png'));
  await sharp(roundedPath).resize(32, 32).png().toFile(path.join(outDir, 'favicon.ico'));

  fs.mkdirSync(path.join(outDir, 'images'), { recursive: true });
  await sharp(transparentPen).png().toFile(path.join(outDir, 'images', 'pen-icon.png'));

  console.log('favicon files ready');
})().catch((e) => {
  console.error(e);
  process.exit(1);
});
