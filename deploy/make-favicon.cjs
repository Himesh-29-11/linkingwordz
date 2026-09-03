const sharp = require('sharp');
const fs = require('fs');
const path = require('path');

const src = process.argv[2] || path.join(__dirname, '../public/images/pen-icon.png');
const outDir = process.argv[3] || path.join(__dirname, '../public');
const CORNER_RADIUS_AT_32 = 15;

function cornerRadius(size) {
  return Math.min(CORNER_RADIUS_AT_32 * (size / 32), size / 2);
}

function svgRoundedMask(size) {
  const r = cornerRadius(size);
  return Buffer.from(
    `<svg width="${size}" height="${size}" xmlns="http://www.w3.org/2000/svg"><rect width="${size}" height="${size}" rx="${r}" ry="${r}" fill="#fff"/></svg>`
  );
}

function svgRoundedRing(size) {
  const inset = Math.max(4, Math.round(size * 0.02));
  const r = Math.max(1, cornerRadius(size) - inset);
  const dim = size - inset * 2;
  return Buffer.from(
    `<svg width="${size}" height="${size}" xmlns="http://www.w3.org/2000/svg"><rect x="${inset}" y="${inset}" width="${dim}" height="${dim}" rx="${r}" ry="${r}" fill="none" stroke="#104547" stroke-width="${Math.max(4, Math.round(size * 0.031))}"/></svg>`
  );
}

async function makePenFromIcon(imagePath) {
  const { data, info } = await sharp(imagePath).ensureAlpha().raw().toBuffer({ resolveWithObject: true });
  const px = Buffer.from(data);

  for (let i = 0; i < px.length; i += 4) {
    if (px[i] < 30 && px[i + 1] < 30 && px[i + 2] < 30) {
      px[i + 3] = 0;
    }
  }

  return sharp(px, {
    raw: { width: info.width, height: info.height, channels: 4 },
  })
    .png()
    .toBuffer();
}

async function buildFavicon(pen) {
  const size = 512;
  const penSize = Math.floor(size * 0.52);
  const resizedPen = await sharp(pen)
    .resize(penSize, penSize, {
      fit: 'contain',
      background: { r: 0, g: 0, b: 0, alpha: 0 },
    })
    .png()
    .toBuffer();

  const creamTile = await sharp({
    create: {
      width: size,
      height: size,
      channels: 4,
      background: { r: 245, g: 243, b: 240, alpha: 255 },
    },
  })
    .composite([{ input: svgRoundedMask(size), blend: 'dest-in' }])
    .png()
    .toBuffer();

  const withPen = await sharp(creamTile)
    .composite([{ input: resizedPen, gravity: 'centre' }])
    .png()
    .toBuffer();

  const withRing = await sharp(withPen)
    .composite([{ input: svgRoundedRing(size), gravity: 'centre' }])
    .png()
    .toBuffer();

  return sharp(withRing)
    .composite([{ input: svgRoundedMask(size), blend: 'dest-in' }])
    .png()
    .toBuffer();
}

(async () => {
  const pen = await makePenFromIcon(src);
  const composed = await buildFavicon(pen);

  await sharp(composed).png().toFile(path.join(outDir, 'apple-touch-icon.png'));
  await sharp(composed).resize(32, 32).png().toFile(path.join(outDir, 'favicon-32x32.png'));
  await sharp(composed).resize(16, 16).png().toFile(path.join(outDir, 'favicon-16x16.png'));
  await sharp(composed).resize(48, 48).png().toFile(path.join(outDir, 'favicon.png'));
  await sharp(composed).resize(32, 32).png().toFile(path.join(outDir, 'favicon.ico'));

  console.log('Rounded favicon files ready');
})().catch((error) => {
  console.error(error);
  process.exit(1);
});
