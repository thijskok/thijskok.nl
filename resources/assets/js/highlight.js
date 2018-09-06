/**
 * Highlight.js
 */
var hljs = require('highlight.js/lib/highlight');
hljs.registerLanguage('php', require('highlight.js/lib/languages/php'));

document.addEventListener('DOMContentLoaded', function () {
    // Get all "code" elements
    const codeBlocks = Array.prototype.slice.call(document.querySelectorAll('pre'), 0);

    // Check if there are any code blocks
    if (codeBlocks.length > 0) {

        // Highlight each of them
        codeBlocks.forEach(function ($el) {
            hljs.highlightBlock($el);
        });
    }

});
