const toolUsagesCountView = document.getElementById("toolUsagesCountView");
async function updateUsages(id) {
    try {
        const response = await fetch("/update-tool-usages", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]',
                ).content,
                Accept: "application/json",
            },
            body: JSON.stringify({
                slug: id,
            }),
        });

        const data = await response.json();

        toolUsagesCountView.innerHTML = data?.usages;
    } catch (error) {
        console.error(error);
    }
}

export default updateUsages;
