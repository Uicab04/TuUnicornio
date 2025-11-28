"use client"

import { Code2, Smartphone, Zap, BarChart3, Shield, Headphones } from "lucide-react"

const services = [
  {
    icon: Code2,
    title: "Desarrollo Custom",
    description: "Webs diseñadas específicamente para tu negocio, no plantillas genéricas.",
  },
  {
    icon: Smartphone,
    title: "Responsive Design",
    description: "Perfecta en celulares, tablets y computadoras. Experiencia óptima siempre.",
  },
  {
    icon: Zap,
    title: "Ultra Rápida",
    description: "Velocidad de carga optimizada. Google lo ama, tus clientes también.",
  },
  {
    icon: BarChart3,
    title: "SEO Incluido",
    description: "Posicionada para que te encuentren en buscadores desde día uno.",
  },
  {
    icon: Shield,
    title: "Seguridad Premium",
    description: "Protegida contra ataques, actualizaciones automáticas incluidas.",
  },
  {
    icon: Headphones,
    title: "Soporte Permanente",
    description: "Cambios, mejoras y actualizaciones mientras tu negocio crezca.",
  },
]

export function Services() {
  return (
    <section className="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-background via-card/50 to-background">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-16">
          <h2 className="text-4xl md:text-5xl font-bold mb-4">Lo que incluye tu web</h2>
          <p className="text-xl text-muted-foreground max-w-2xl mx-auto">
            Todo profesional. Todo incluido. Sin sorpresas, sin costos ocultos.
          </p>
        </div>

        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          {services.map((service, index) => {
            const Icon = service.icon
            return (
              <div
                key={index}
                className="p-6 rounded-xl border border-border hover:border-primary/50 bg-card hover:bg-card/80 transition-all duration-300 group"
              >
                <div className="w-12 h-12 rounded-lg bg-gradient-to-br from-primary to-accent flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                  <Icon className="w-6 h-6 text-primary-foreground" />
                </div>
                <h3 className="font-bold text-lg mb-2">{service.title}</h3>
                <p className="text-muted-foreground">{service.description}</p>
              </div>
            )
          })}
        </div>
      </div>
    </section>
  )
}
