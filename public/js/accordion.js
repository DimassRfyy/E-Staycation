document.addEventListener('DOMContentLoaded', function() {
  const accordionBtns = document.querySelectorAll('.accordion-button');

  accordionBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      const targetId = this.dataset.accordion;
      const targetAccordion = document.getElementById(targetId);
      const arrowIcon = this.querySelector('.arrow img');

      btn.classList.toggle('open');
      targetAccordion.classList.toggle('hide');

      if (targetAccordion.classList.contains('hide')) {
        targetAccordion.style.maxHeight = targetAccordion.scrollHeight + "px";
        setTimeout(function() {
          targetAccordion.style.maxHeight = "0";
        }, 1);
      } else {
        targetAccordion.style.maxHeight = targetAccordion.scrollHeight + "px";
        setTimeout(function() {
          targetAccordion.style.maxHeight = "none";
        }, 301);
      }

      arrowIcon.classList.toggle('rotate-180');
    });

    const targetId = btn.dataset.accordion;
    const targetAccordion = document.getElementById(targetId);

    // Check if accordion section has 'open' class
    if (targetAccordion.classList.contains('open')) {
      btn.classList.add('open');
      targetAccordion.style.maxHeight = "none";
    }
  });
});