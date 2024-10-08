// Asegúrate de que el DOM esté cargado antes de ejecutar el script
document.addEventListener("DOMContentLoaded", function() {
    // Registra el plugin ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);

    // Selecciona todos los elementos
    const img_1 = document.querySelectorAll('#img-1-gsap');
    
    ScrollTrigger.defaults({
        // Defaults are used by all ScrollTriggers
        toggleActions: "play pause resume restart", // Scoll effect Forward, Leave, Back, Back Leave
        //markers: true // Easaly remove markers for production 
      });
      
      const timelineHeader = gsap.timeline({
        scrollTrigger: {
          id: "ZOOM", // Custom label to the marker
          trigger: img_1, // What element triggers the scroll
          scrub: 0.5, // Add a small delay of scrolling and animation. `true` is direct
          start: "top center", // Start at top of Trigger and at the top of the viewport
          end: "+=100% 50px", // The element is 500px hight and end 50px from the top of the viewport
        }
      });
      
      timelineHeader
        .fromTo("#img-1-gsap", { y: -200 }, { y: 200, duration: 1 }, "sameTime")
        .to("#img-2-gsap", { y: -200, duration: 1 }, "sameTime")

});