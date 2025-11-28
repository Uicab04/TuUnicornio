"use client"

import { ArrowRight, Rocket } from "lucide-react"

export function Hero() {
  return (
    <section className="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
      <div className="absolute inset-0 -z-10 pointer-events-none">
        <div className="absolute top-0 left-1/4 w-96 h-96 bg-primary/30 rounded-full blur-3xl opacity-20"></div>
        <div className="absolute bottom-20 right-1/4 w-96 h-96 bg-accent/20 rounded-full blur-3xl opacity-20"></div>
      </div>

      <div className="max-w-7xl mx-auto">
        <div className="grid lg:grid-cols-2 gap-12 items-center">
          <div>
            <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-primary/50 bg-primary/10 mb-6">
              <Rocket className="w-4 h-4 text-primary" />
              <span className="text-sm font-medium text-primary">Impulsamos tu crecimiento</span>
            </div>

            <h1 className="text-5xl md:text-6xl font-bold mb-6 leading-tight">
              Tu sueño{" "}
              <span className="bg-gradient-to-r from-primary via-accent to-primary bg-clip-text text-transparent">
                hecho realidad
              </span>
            </h1>

            <p className="text-xl text-muted-foreground mb-8 leading-relaxed">
              Transformamos tu visión en una web profesional y potente. Sin costo. Sin complicaciones. Solo enfocados en
              tu éxito.
            </p>

            <div className="flex flex-col sm:flex-row gap-4 mb-12">
              <button className="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-lg bg-primary hover:bg-primary/90 text-primary-foreground font-semibold transition-all duration-300 group">
                Comienza Ahora
                <ArrowRight className="w-5 h-5 group-hover:translate-x-1 transition-transform" />
              </button>
              <button className="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-lg border border-primary/50 hover:bg-primary/10 text-foreground font-semibold transition-all duration-300">
                Ver Ejemplos
              </button>
            </div>

            <div className="flex items-center gap-8 text-sm">
              <div>
                <p className="font-bold text-lg">100% Gratis</p>
                <p className="text-muted-foreground">Sin inversión inicial</p>
              </div>
              <div>
                <p className="font-bold text-lg">Soporte Total</p>
                <p className="text-muted-foreground">Cambios ilimitados</p>
              </div>
            </div>
          </div>

          <div className="relative h-96 lg:h-full min-h-96">
            <div className="absolute inset-0 bg-gradient-to-br from-primary/20 to-accent/20 rounded-2xl backdrop-blur-sm border border-primary/30 p-8 flex items-center justify-center">
              <div className="text-center">
                <div className="w-24 h-24 rounded-full bg-gradient-to-br from-primary to-accent mx-auto mb-6 animate-pulse"></div>
                <p className="text-lg font-semibold mb-2">Tu web</p>
                <p className="text-muted-foreground">Diseño profesional que convierte</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}
