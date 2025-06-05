import axios from "axios";

class ContactForm {
  constructor(formId, responseContainerClass) {
    this.form = document.getElementById(formId);
    this.responseContainer = this.form.querySelector(`.${responseContainerClass}`);
    this.init();
  }

  init() {
    this.form.addEventListener("submit", this.handleSubmit.bind(this));
  }

  async handleSubmit(e) {
    e.preventDefault();
    const formData = new FormData(this.form);

    this.showLoadingMessage();

    try {
      const response = await axios.post(this.form.action, formData);
      this.showSuccessMessage();
      this.form.reset();
    } catch (error) {
      this.showErrorMessage();
      console.error("Form submission error:", error);
    }
  }

  showLoadingMessage() {
    this.responseContainer.innerHTML = "<p>Sending your message...</p>";
    this.responseContainer.style.display = "block";
  }

  showSuccessMessage() {
    this.responseContainer.innerHTML = '<p class="success">Thank you! Your message has been sent.</p>';
  }

  showErrorMessage() {
    this.responseContainer.innerHTML =
      '<p class="error">Sorry, there was an error sending your message. Please try again.</p>';
  }
}

// Usage when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  new ContactForm("custom-contact-form", "form-response");
});
export default ContactForm;
