import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { bunny } from "laravel-vite-plugin/fonts";
import tailwindcss from "@tailwindcss/vite";
import obfuscator from "vite-plugin-javascript-obfuscator";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
            fonts: [
                bunny("Instrument Sans", {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
        obfuscator({
            apply: "build",
            options: {
                compact: true,
                identifierNamesGenerator: "hexadecimal",

                stringArray: true,
                stringArrayThreshold: 0.75,
                stringArrayEncoding: ["base64"],

                renameGlobals: false,
                selfDefending: false,
                disableConsoleOutput: false,

                controlFlowFlattening: false,
                deadCodeInjection: false,
                debugProtection: false,
                unicodeEscapeSequence: false,
            },
        }),
    ],
    server: {
        watch: {
            ignored: ["**/storage/framework/views/**"],
        },
    },
});
