import express from 'express';
import { fileURLToPath } from 'url';
import { dirname, resolve } from 'path';

const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

const app = express();

// خدمة الملفات الثابتة
app.use(express.static('./'));

// توجيه كل المسارات إلى الصفحة الرئيسية
app.get('*', (req, res) => {
  res.sendFile(resolve(__dirname, 'index.html'));
});

// تعيين المنفذ
const PORT = process.env.PORT || 5000;
app.listen(PORT, '0.0.0.0', () => {
  console.log(`الخادم يعمل على المنفذ ${PORT}`);
});