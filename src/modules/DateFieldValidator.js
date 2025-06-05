import axios from "axios";

class DateFieldValidator {
  constructor() {
    // Check if we're on a page with ACF date fields
    if (document.querySelector('[data-key="date_started"]')) {
      this.initDateValidation();
    }
  }

  initDateValidation() {
    // Wait for ACF to initialize
    acf.addAction("ready", () => {
      // Cache DOM elements
      this.startDateField = document.querySelector('[data-key="date_started"] input.date-picker');
      this.endDateField = document.querySelector('[data-key="date_ended"] input.date-picker');

      // Add event listener if fields exist
      if (this.startDateField && this.endDateField) {
        this.startDateField.addEventListener("change", this.handleStartDateChange.bind(this));
      }
    });
  }

  handleStartDateChange() {
    const startDate = new Date(this.startDateField.value);

    // If start date is valid
    if (!isNaN(startDate.getTime())) {
      // Format date as YYYY-MM-DD for min attribute
      const minDate =
        startDate.getFullYear() +
        "-" +
        String(startDate.getMonth() + 1).padStart(2, "0") +
        "-" +
        String(startDate.getDate()).padStart(2, "0");

      // Set min attribute on end date field
      this.endDateField.setAttribute("min", minDate);

      // If end date is already set and invalid, clear it
      const endDate = new Date(this.endDateField.value);
      if (!isNaN(endDate.getTime()) && endDate < startDate) {
        this.endDateField.value = "";
      }
    }
  }
}

export default DateFieldValidator;
