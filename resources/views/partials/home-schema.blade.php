<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "WebSite",
    "name": "{{ config('app.name') }}",
    "url": "{{ url('/') }}",
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
            "name": "What are online image tools?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Online image tools help you compress, resize, convert, and optimize images directly in your browser. These tools make images smaller, faster, and ready for websites, social media, and online platforms."
            }
        },
        {
            "@@type": "Question",
            "name": "Are image tools free to use?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "{{ config('app.name') }} provides free online image tools with no registration, subscription, or hidden charges. You can optimize your images instantly from your browser."
            }
        },
        {
            "@@type": "Question",
            "name": "Are my images uploaded to a server?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "No. All image processing happens locally in your browser. Your files stay on your device and are never uploaded to external servers, ensuring complete privacy."
            }
        },
        {
            "@@type": "Question",
            "name": "Which image formats are supported?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "{{ config('app.name') }} supports popular image formats including JPG, JPEG, PNG, and WebP for compression, conversion, and optimization."
            }
        },
        {
            "@@type": "Question",
            "name": "Can I use these image tools on mobile devices?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Yes. Our browser-based image tools work smoothly on mobile phones, tablets, and desktop devices without installing any software."
            }
        },
        {
            "@@type": "Question",
            "name": "Do I need to create an account to use the tools?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "No account is required. You can use all available image tools instantly without registration."
            }
        },
        {
            "@@type": "Question",
            "name": "How does image compression improve website performance?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Image compression reduces file size, improves page loading speed, saves bandwidth, and helps create a better user experience and SEO performance."
            }
        }
    ]
}
</script>