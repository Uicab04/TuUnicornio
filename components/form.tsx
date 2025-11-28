"use client"

import type React from "react"

import { useState } from "react"
import { Mail, Phone, Globe } from "lucide-react"

export function Form() {
  const [formData, setFormData] = useState({
    nombre: "",
    email: "",
    empresa: "",
    descripcion: "",
    presupuesto: "",
  })

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement | HTMLSelectElement>) => {
    setFormData((prev) => ({
      ...prev,
      [e.target.name]: e.target.value,
    }))
  }

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault()
    // Aquí iría la lógica de envío del formulario
    console.log("Formulario enviado:", formData)
    alert("¡Gracias! Nos contactaremos pronto para llevar a cabo tu proyecto.")
    setFormData({ nombre: "", email: "", empresa: "", descripcion: "", presupuesto: "" })
  }

  return (
    <section id="solicitar" className="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-background to-card/30">
      <div className="max-w-4xl mx-auto">
        <div className="text-center mb-16">
          <h2 className="text-4xl md:text-5xl font-bold mb-4">Solicita tu web gratis</h2>
          <p className="text-xl text-muted-foreground">
            Cuéntanos tu visión y nosotros nos encargamos del resto. Respuesta garantizada en 24 horas.
          </p>
        </div>

        <div className="grid lg:grid-cols-2 gap-12">
          <form onSubmit={handleSubmit} className="space-y-6">
            <div>
              <label className="block text-sm font-semibold mb-2">Tu Nombre</label>
              <input
                type="text"
                name="nombre"
                value={formData.nombre}
                onChange={handleChange}
                placeholder="Tu nombre completo"
                className="w-full px-4 py-3 rounded-lg bg-input border border-border focus:border-primary outline-none transition-colors text-foreground placeholder:text-muted-foreground"
                required
              />
            </div>

            <div>
              <label className="block text-sm font-semibold mb-2">Email</label>
              <input
                type="email"
                name="email"
                value={formData.email}
                onChange={handleChange}
                placeholder="tu@email.com"
                className="w-full px-4 py-3 rounded-lg bg-input border border-border focus:border-primary outline-none transition-colors text-foreground placeholder:text-muted-foreground"
                required
              />
            </div>

            <div>
              <label className="block text-sm font-semibold mb-2">Nombre de tu Empresa/Negocio</label>
              <input
                type="text"
                name="empresa"
                value={formData.empresa}
                onChange={handleChange}
                placeholder="Mi empresa"
                className="w-full px-4 py-3 rounded-lg bg-input border border-border focus:border-primary outline-none transition-colors text-foreground placeholder:text-muted-foreground"
                required
              />
            </div>

            <div>
              <label className="block text-sm font-semibold mb-2">¿Qué tipo de web necesitas?</label>
              <select
                name="presupuesto"
                value={formData.presupuesto}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-lg bg-input border border-border focus:border-primary outline-none transition-colors text-foreground"
                required
              >
                <option value="">Selecciona una opción</option>
                <option value="ecommerce">Tienda Online (Ecommerce)</option>
                <option value="portfolio">Portafolio / Blog</option>
                <option value="servicios">Web de Servicios</option>
                <option value="saas">Plataforma/SaaS</option>
                <option value="otro">Otra solución personalizada</option>
              </select>
            </div>

            <div>
              <label className="block text-sm font-semibold mb-2">Cuéntanos tu proyecto</label>
              <textarea
                name="descripcion"
                value={formData.descripcion}
                onChange={handleChange}
                placeholder="¿Cuál es tu visión? ¿Qué te diferencia? Cuéntanos tus objetivos..."
                rows={5}
                className="w-full px-4 py-3 rounded-lg bg-input border border-border focus:border-primary outline-none transition-colors text-foreground placeholder:text-muted-foreground resize-none"
                required
              />
            </div>

            <button
              type="submit"
              className="w-full py-4 rounded-lg bg-gradient-to-r from-primary to-accent hover:shadow-lg hover:shadow-primary/25 text-primary-foreground font-bold transition-all duration-300"
            >
              Enviar Mi Solicitud
            </button>
          </form>

          <div className="space-y-8">
            <div className="bg-card rounded-xl p-8 border border-border">
              <h3 className="font-bold text-xl mb-4">¿Qué ocurre después?</h3>
              <ul className="space-y-4 text-muted-foreground">
                <li className="flex gap-3">
                  <span className="text-primary font-bold">1.</span>
                  <span>Revisamos tu solicitud cuidadosamente</span>
                </li>
                <li className="flex gap-3">
                  <span className="text-primary font-bold">2.</span>
                  <span>Nos ponemos en contacto en 24 horas</span>
                </li>
                <li className="flex gap-3">
                  <span className="text-primary font-bold">3.</span>
                  <span>Planificamos tu proyecto en detalle</span>
                </li>
                <li className="flex gap-3">
                  <span className="text-primary font-bold">4.</span>
                  <span>Comenzamos el desarrollo de tu web</span>
                </li>
              </ul>
            </div>

            <div className="space-y-4">
              <div className="flex items-start gap-3 p-4 rounded-lg bg-primary/10 border border-primary/30">
                <Mail className="w-5 h-5 text-primary flex-shrink-0 mt-1" />
                <div>
                  <p className="font-semibold">Email directo</p>
                  <p className="text-sm text-muted-foreground">contacto@desatatupotencial.com</p>
                </div>
              </div>
              <div className="flex items-start gap-3 p-4 rounded-lg bg-primary/10 border border-primary/30">
                <Phone className="w-5 h-5 text-primary flex-shrink-0 mt-1" />
                <div>
                  <p className="font-semibold">Respuesta en 24h</p>
                  <p className="text-sm text-muted-foreground">Garantizado</p>
                </div>
              </div>
              <div className="flex items-start gap-3 p-4 rounded-lg bg-primary/10 border border-primary/30">
                <Globe className="w-5 h-5 text-primary flex-shrink-0 mt-1" />
                <div>
                  <p className="font-semibold">Soporte permanente</p>
                  <p className="text-sm text-muted-foreground">Cambios ilimitados siempre</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}
