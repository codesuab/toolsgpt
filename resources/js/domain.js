(() => {
    const ALLOWED = [
        "toolsgpt.net",
        "www.toolsgpt.net",
        "localhost",
        "127.0.0.1",
        "tool-gpt.test",
    ];

    const host = location.hostname.toLowerCase();

    if (!ALLOWED.includes(host)) {
        location.replace("https://toolsgpt.net");
        throw new Error("Unauthorized Domain");
    }
})();
