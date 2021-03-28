EPUBJS.Render.Iframe.prototype.resize =
    function(a, b) {
        this.element && (this.element.style.height = b, isNaN(a) || a % 2 == 0 || (a += 1), this.element.style.width = a, this.iframe && (this.iframe.height = b, this.iframe.width = a), this._height = b, this._width = a, this.width = this.element.getBoundingClientRect().width || a, this.height = this.element.getBoundingClientRect().height || b)
    },
    EPUBJS.Render.Iframe.prototype.resized =
    function(a) {
        this.width = this.iframe.getBoundingClientRect().width, this.height = this.iframe.getBoundingClientRect().height
    },
    EPUBJS.Render.Iframe.prototype.totalWidth =
    function() { return this.docEl.scrollWidth },
    EPUBJS.Render.Iframe.prototype.totalHeight =
    function() { return this.docEl.scrollHeight },
    EPUBJS.Render.Iframe.prototype.setPageDimensions =
    function(a, b) {
        this.pageWidth = a, this.pageHeight = b
    },
    EPUBJS.Render.Iframe.prototype.setDirection =
    function(a) {
        this.direction = a, this.docEl && "rtl" == this.docEl.dir && (this.docEl.dir = "rtl", "pre-paginated" !== this.layout && (this.docEl.style.position = "static", this.docEl.style.right = "auto"))
    },
    EPUBJS.Render.Iframe.prototype.setLeft =
    function(a) {
        this.isMobile ? this.docEl.style[this.transform] = "translate(" + -a + "px, 0)
" : this.document.defaultView.scrollTo(a, 0)
},
EPUBJS.Render.Iframe.prototype.setLayout =
    function(a) { this.layout = a },
    EPUBJS.Render.Iframe.prototype.setStyle =
    function(a, b, c) {
        c && (a =
            EPUBJS.core.prefixed(a)), this.bodyEl && (this.bodyEl.style[a] = b)
    },
    EPUBJS.Render.Iframe.prototype.removeStyle =
    function(a) { this.bodyEl && (this.bodyEl.style[a] = "") },
    EPUBJS.Render.Iframe.prototype.setClasses =
    function(a) { this.bodyEl && (this.bodyEl.className = a.join(" ")) },
    EPUBJS.Render.Iframe.prototype.addHeadTag =
    function(a, b, c) {