<template>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form @submit.prevent="shortenUrl" class="mb-3">
                <div class="input-group">
                    <input
                        type="url"
                        v-model="originalUrl"
                        class="form-control"
                        placeholder="Enter URL"
                        required
                    />
                    <button type="submit" class="btn btn-primary">
                        Shorten
                    </button>
                </div>
            </form>
            <div v-if="shortenedUrl" class="alert alert-success">
                Shortened URL:
                <a :href="'/' + shortenedUrl" target="_blank">{{
                    shortenedUrl
                }}</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            originalUrl: "",
            shortenedUrl: "",
        };
    },
    methods: {
        async shortenUrl() {
            try {
                const response = await fetch("/urls", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify({ original_url: this.originalUrl }),
                });
                const data = await response.json();
                this.shortenedUrl = data.short_url;
            } catch (error) {
                console.error("Error shortening URL:", error);
            }
        },
    },
};
</script>
