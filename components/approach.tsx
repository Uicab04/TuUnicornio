"use client"

import { CheckCircle2 } from "lucide-react"

const steps = [
  {
    number: "01",
    title: "Entendemos tu visión",
    description: "Escuchamos tus ideas, necesidades y objetivos. Tu sueño es nuestro blueprint.",
  },
  {
    number: "02",
    title: "Diseño y estrategia",
    description: "Creamos una web que no solo se ve bien, sino que vende y convierte clientes.",
  },
  {
    number: "03",
    title: "Desarrollo profesional",
    description: "Programamos con tecnología moderna, IA optimizada y estándares internacionales.",
  },
  {
    number: "04",
    title: "Lanzamiento y seguimiento",
    description: "Tu web está lista. Y nosotros seguimos contigo en cada paso del crecimiento.",
  },
]

export function Approach() {
  return (
    <section className="py-20 px-4 sm:px-6 lg:px-8">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-16">
          <h2 className="text-4xl md:text-5xl font-bold mb-4">Nuestro proceso</h2>
          <p className="text-xl text-muted-foreground max-w-2xl mx-auto">
            Cuatro pasos simples para llevar tu negocio al siguiente nivel.
          </p>
        </div>

        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
          {steps.map((step, index) => (
            <div key={index} className="relative">
              <div className="p-8 rounded-xl border border-border bg-card hover:border-primary/50 transition-all duration-300">
                <div className="text-5xl font-bold text-primary/30 mb-4">{step.number}</div>
                <h3 className="font-bold text-lg mb-2">{step.title}</h3>
                <p className="text-muted-foreground text-sm">{step.description}</p>
              </div>
              {index < steps.length - 1 && (
                <div className="hidden lg:block absolute top-1/2 right-0 translate-x-1/2 transform -translate-y-1/2">
                  <div className="w-6 h-6 rounded-full border-2 border-primary/30"></div>
                </div>
              )}
            </div>
          ))}
        </div>

        <div className="bg-gradient-to-r from-card to-card/50 rounded-xl p-8 border border-border">
          <h3 className="font-bold text-2xl mb-6">¿Por qué lo hacemos gratis?</h3>
          <div className="grid md:grid-cols-2 gap-8">
            <div>
              <p className="text-lg text-muted-foreground mb-6 leading-relaxed">
                Creemos en el poder de empoderar emprendedores. Cuando tu negocio crece, nosotros crecemos contigo.
              </p>
              <div className="space-y-4">
                <div className="flex gap-3">
                  <CheckCircle2 className="w-6 h-6 text-primary flex-shrink-0" />
                  <p>La IA nos permite optimizar procesos sin costos</p>
                </div>
                <div className="flex gap-3">
                  <CheckCircle2 className="w-6 h-6 text-primary flex-shrink-0" />
                  <p>Tu éxito es nuestro mejor referencia</p>
                </div>
                <div className="flex gap-3">
                  <CheckCircle2 className="w-6 h-6 text-primary flex-shrink-0" />
                  <p>Inversión en relaciones a largo plazo</p>
                </div>
              </div>
            </div>
            <div className="bg-primary/10 rounded-lg p-6 border border-primary/30">
              <p className="font-semibold mb-4">Nuestro compromiso contigo:</p>
              <ul className="space-y-3 text-sm">
                <li>✓ Cambios ilimitados mientras tu negocio evoluciona</li>
                <li>✓ Soporte permanente y garantizado</li>
                <li>✓ Mejoras constantes con nuevas features</li>
                <li>✓ Crecimiento juntos desde el inicio</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}
