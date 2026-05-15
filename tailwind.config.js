import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
       
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

   theme: {
    container: { center: true, padding: '1rem' },
    extend: {
        colors: {
            primary: '#1D4ED8',      /* Biru yang lebih pekat dan solid (Tailwind Blue-700) */
            primaryHover: '#1E40AF', /* Biru sangat gelap untuk interaksi hover */
            dark: '#0F172A',         /* Hitam kebiruan yang sangat tegas/pekat (Slate-900) */
            body: '#334155',         /* Abu-abu gelap agar teks paragraf lebih tajam terbaca (Slate-700) */
            light: '#F8FAFC',        /* Putih keabu-abuan yang lebih bersih (Slate-50) */
            stroke: '#CBD5E1',       /* Garis border lebih terlihat, tidak terlalu transparan */
            secondary: '#059669',    /* Hijau yang lebih bold dan profesional (Emerald-600) */
        },
        fontFamily: { sans: ['Inter', 'sans-serif'] },
        boxShadow: {
            /* Shadow dibuat lebih dalam dengan opacity hitam yang sedikit dinaikkan */
            'card': '0 4px 6px -1px rgba(0, 0, 0, 0.12), 0 2px 4px -2px rgba(0, 0, 0, 0.08)',
            'card-hover': '0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 8px 10px -6px rgba(0, 0, 0, 0.1)',
            'header': '0 4px 6px -1px rgba(0, 0, 0, 0.08)',
            'dropdown': '0 10px 25px -5px rgba(0, 0, 0, 0.15), 0 8px 10px -6px rgba(0, 0, 0, 0.1)',
        }
    }
},

    plugins: [forms],
};
