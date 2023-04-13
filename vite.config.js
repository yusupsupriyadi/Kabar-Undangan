import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import minify from "vite-plugin-minify";

export default defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/css/app.css",
        "resources/js/app.js",
      ],
      refresh: true,
    }),
    minify({
      css: true,
      js: true,
      html: {
        removeComments: true,
        collapseWhitespace: true,
        conservativeCollapse: true,
      },
    }),
  ],
  resolve: {
    alias: {
      $: "jquery",
    },
  },
});
