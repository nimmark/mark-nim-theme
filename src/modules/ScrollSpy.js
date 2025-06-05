class ScrollSpy {
  constructor(menuSelector, offset = 100) {
    this.menuLinks = document.querySelectorAll(`${menuSelector} .menu-link`);
    this.sections = [];
    this.offset = offset;

    this.init();
    this.bindScroll();
    this.bindClicks(); // <— NEW
  }

  init() {
    this.menuLinks.forEach((link) => {
      const href = link.getAttribute("href");
      if (href && href.startsWith("#") && href.length > 1) {
        const section = document.querySelector(href);
        if (section) {
          this.sections.push({
            id: href,
            element: section,
          });
        }
      }
    });
  }

  bindScroll() {
    window.addEventListener("scroll", () => this.onScroll());
    this.onScroll(); // initial highlight
  }

  bindClicks() {
    this.menuLinks.forEach((link) => {
      link.addEventListener("click", (e) => {
        e.preventDefault();
        const targetId = link.getAttribute("href");
        const targetSection = document.querySelector(targetId);

        if (targetSection) {
          const top = targetSection.offsetTop - this.offset;
          window.scrollTo({
            top: top,
            behavior: "smooth",
          });
        }
      });
    });
  }

  onScroll() {
    const scrollPos = window.scrollY + this.offset;

    let currentSectionId = "";

    for (let i = 0; i < this.sections.length; i++) {
      const sectionTop = this.sections[i].element.offsetTop;

      if (scrollPos >= sectionTop) {
        currentSectionId = this.sections[i].id;
      }
    }

    this.menuLinks.forEach((link) => {
      if (link.getAttribute("href") === currentSectionId) {
        link.classList.add("active");
      } else {
        link.classList.remove("active");
      }
    });
  }
}

// Usage
document.addEventListener("DOMContentLoaded", () => {
  new ScrollSpy(".site-header__main-nav", 100); // adjust offset if needed
});

export default ScrollSpy;
