module.exports = {
    // purge: [
    //   './public/**/*.html',
    //   './resources/js/*.js',
    // ],
    content: [
      "./views/**/*.blade.php",
      "./**/*.js",
      "./**/*.css",
    ],
    theme: {
      fontFamily: {
        'seg': ['Segoe UI', 'Sans', 'Arial'],
      },
      extend: {},
    },
    plugins: [
      require('tailwindcss'),
      require('autoprefixer'),
    //   require('@tailwindcss/forms'),
    ],
  };