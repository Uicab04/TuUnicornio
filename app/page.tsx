import { Header } from "@/components/header"
import { Hero } from "@/components/hero"
import { Services } from "@/components/services"
import { Approach } from "@/components/approach"
import { Form } from "@/components/form"
import { Footer } from "@/components/footer"

export const metadata = {
  title: "Desata Tu Potencial - Web a Medida Gratis",
  description:
    "Transformamos tu visión en realidad digital. Soluciones de software custom gratuitas para que tu negocio crezca sin límites.",
}

export default function Home() {
  return (
    <main className="min-h-screen bg-background text-foreground">
      <Header />
      <Hero />
      <Services />
      <Approach />
      <Form />
      <Footer />
    </main>
  )
}
