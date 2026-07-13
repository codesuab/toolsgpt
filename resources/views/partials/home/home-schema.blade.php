<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "WebSite",
    "name": "{{ config('app.name') }}",
    "url": "{{ url('/') }}",
    "description": "AI tools and free browser-based utilities for images, files, PDFs, text, developers, and productivity.",
    "potentialAction": {
        "@@type": "SearchAction",
        "target": "{{ url('/') }}?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>

<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "FAQPage",
    "mainEntity": [
        {
            "@@type": "Question",
            "name": "Is ToolsGPT really free?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Yes. ToolsGPT provides free AI tools and online utilities for images, files, text, developers, and productivity. Most tools can be used without registration or limits."
            }
        },
        {
            "@@type": "Question",
            "name": "Do my files get uploaded to a server?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Most ToolsGPT utilities process files directly in your browser. Your images, PDFs, and documents stay on your device whenever local processing is available."
            }
        },
        {
            "@@type": "Question",
            "name": "What type of tools does ToolsGPT offer?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "ToolsGPT offers AI tools, image tools, PDF utilities, file converters, developer tools, text tools, calculators, and productivity solutions."
            }
        },
        {
            "@@type": "Question",
            "name": "Do I need an account to use ToolsGPT?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "No. You can use most ToolsGPT tools instantly without creating an account. Registration is only needed for optional features like saving history."
            }
        },
        {
            "@@type": "Question",
            "name": "Are ToolsGPT tools safe and private?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Yes. ToolsGPT focuses on privacy and security. Browser-based tools process data locally whenever possible, keeping your files on your device."
            }
        },
        {
            "@@type": "Question",
            "name": "Can I use ToolsGPT on mobile devices?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Yes. ToolsGPT works on mobile phones, tablets, and desktop browsers without installing additional software."
            }
        },
        {
            "@@type": "Question",
            "name": "Do ToolsGPT tools require installation?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "No. ToolsGPT provides browser-based online tools that work directly from your web browser without downloads or installations."
            }
        },
        {
            "@@type": "Question",
            "name": "How often are new tools added to ToolsGPT?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "New AI tools and online utilities are added regularly based on technology updates, user needs, and community feedback."
            }
        }
    ]
}
</script>