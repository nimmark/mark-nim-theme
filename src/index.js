import "../sass/main.scss";

// Our modules / classes
import MobileMenu from "../src/modules/MobileMenu";
import ScrollSpy from "../src/modules/ScrollSpy";
import StickyHeader from "../src/modules/StickyHeader";
// import IntersectionObserver from "../src/modules/IntersectionObserver";
import AnimateOnScroll from "../src/modules/Aos";

// Instantiate a new object using our modules/classes
const mobileMenu = new MobileMenu();
const scrollSpy = new ScrollSpy();
const stickyHeader = new StickyHeader();
// const intersectionObserver = new IntersectionObserver();
const animateOnScroll = new AnimateOnScroll();
