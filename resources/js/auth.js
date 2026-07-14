class Auth {
    constructor() {
        this.user = null;
        this.authenticated = false;
    }

    async check() {
        const res = await fetch("/auth/state", {
            credentials: "same-origin",
            headers: {
                Accept: "application/json",
            },
        });

        if (!res.ok) {
            this.authenticated = false;
            this.user = null;
            return false;
        }

        const data = await res.json();

        this.authenticated = data.authenticated;
        this.user = data.user;

        return this.authenticated;
    }

    async require() {
        const ok = await this.check();

        if (ok) return true;

        window.dispatchEvent(
            new CustomEvent("auth:required", {
                detail: {
                    reason: "login",
                },
            })
        );

        return false;
    }
}

window.Auth = new Auth();