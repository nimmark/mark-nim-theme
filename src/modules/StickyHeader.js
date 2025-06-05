class StickyHeader {
  constructor(selector, stickyClass = "sticky") {
    this.header = document.querySelector(selector);
    this.stickyClass = stickyClass;
    this.offset = this.header.offsetTop;

    this.handleScroll = this.handleScroll.bind(this);
    window.addEventListener("scroll", this.handleScroll);
  }

  handleScroll() {
    if (window.pageYOffset > this.offset) {
      this.header.classList.add(this.stickyClass);
    } else {
      this.header.classList.remove(this.stickyClass);
    }
  }
}

// Usage
document.addEventListener("DOMContentLoaded", () => {
  new StickyHeader(".site-header");
});

export default StickyHeader;
