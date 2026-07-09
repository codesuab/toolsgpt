async function copyToClipboard(text) {
    if (navigator.clipboard && window.isSecureContext) {
        await navigator.clipboard.writeText(text);
        return;
    }

    const temp = document.createElement("textarea");
    temp.value = text;
    temp.style.position = "fixed";
    temp.style.left = "-9999px";

    document.body.appendChild(temp);
    temp.focus();
    temp.select();

    document.execCommand("copy");
    temp.remove();
}


export default copyToClipboard;