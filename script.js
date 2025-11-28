let currentSlide = 0

function moveSlider(direction) {
  const slider = document.querySelector(".projects-slider")
  const slides = document.querySelectorAll(".project-slide")
  const dots = document.querySelectorAll(".dot")

  currentSlide += direction

  if (currentSlide >= slides.length) {
    currentSlide = 0
  } else if (currentSlide < 0) {
    currentSlide = slides.length - 1
  }

  updateSlider()
}

function goToSlide(index) {
  currentSlide = index
  updateSlider()
}

function updateSlider() {
  const slider = document.querySelector(".projects-slider")
  const slides = document.querySelectorAll(".project-slide")
  const dots = document.querySelectorAll(".dot")

  // Scroll con animación
  const slideWidth = slides[0].offsetWidth
  slider.style.transform = `translateX(-${currentSlide * slideWidth}px)`
  slider.style.transition = "transform 0.5s cubic-bezier(0.4, 0, 0.2, 1)"

  // Actualizar dots
  dots.forEach((dot, index) => {
    dot.classList.toggle("active", index === currentSlide)
  })
}

document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    const href = this.getAttribute("href")
    if (href !== "#" && document.querySelector(href)) {
      e.preventDefault()
      document.querySelector(href).scrollIntoView({
        behavior: "smooth",
        block: "start",
      })
    }
  })
})

const observerOptions = {
  threshold: 0.1,
  rootMargin: "0px 0px -100px 0px",
}

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = "1"
      entry.target.style.transform = "translateY(0)"
    }
  })
}, observerOptions)

document.querySelectorAll(".service-card, .benefit-item").forEach((el) => {
  el.style.opacity = "0"
  el.style.transform = "translateY(20px)"
  el.style.transition = "opacity 0.6s ease, transform 0.6s ease"
  observer.observe(el)
})

const form = document.querySelector(".contact-form")
if (form) {
  form.addEventListener("submit", function (e) {
    const inputs = this.querySelectorAll("input[required], textarea[required], select[required]")
    let isValid = true

    inputs.forEach((input) => {
      if (!input.value.trim()) {
        isValid = false
        input.style.borderColor = "#FF3B30"
        input.style.animation = "shake 0.4s ease"
      } else {
        input.style.borderColor = ""
      }
    })

    if (!isValid) {
      e.preventDefault()
      const alert = document.createElement("div")
      alert.className = "alert alert-error"
      alert.innerHTML = `<span>Por favor, completa todos los campos requeridos.</span><button class="alert-close" onclick="this.parentElement.style.display='none';">✕</button>`
      form.parentElement.insertBefore(alert, form)
    }
  })
}

const style = document.createElement("style")
style.textContent = `
  @keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
  }
`
document.head.appendChild(style)

let autoSlideInterval

function startAutoSlide() {
  autoSlideInterval = setInterval(() => {
    moveSlider(1)
  }, 8000)
}

function resetAutoSlide() {
  clearInterval(autoSlideInterval)
  startAutoSlide()
}

// Iniciar slider automático al cargar
startAutoSlide()

// Pausar cuando el usuario interactúa
document.querySelectorAll(".slider-btn, .dot").forEach((element) => {
  element.addEventListener("click", resetAutoSlide)
})

// Log de inicialización
console.log("[v0] Landing page 'Desata Tu Potencial' cargada correctamente")
console.log("[v0] Slider automático activado")
