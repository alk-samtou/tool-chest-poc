const URL = {

    methods: {
        hasQueryString() {
            return window.location.search.length > 0;
        },

        getQueryParams() {
            return Object.fromEntries(new URLSearchParams(window.location.search));
        },

        buildQueryParams(params) {
            return new URLSearchParams(params).toString();
        },

        getSegments(){
            let segments = window.location.pathname.split('/');
            return segments.filter((v) => v != '');
        },

        goTo(url) {
            if (typeof url === 'string' || url instanceof String){
                window.location = url;
                return;
            }
            let segments = this.getSegments();
            let currentUrl = this.currentURL();
            if(segments.includes('issue')){
               currentUrl = '/service-desk/issues/my-issues';
            }
            window.location = currentUrl + '?' + this.buildQueryParams(url)
        },

        currentURL() {
            let uri = window.location.href;
            let url = uri.split("?");
            return url[0];
        },

        currentPath(){
            return window.location.pathname;
        }
    }
}

export default URL
