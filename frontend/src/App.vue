<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
    <h1>Pastelería</h1>
    <nav>
      <RouterLink to="/ingredientes">Ingredientes</RouterLink>
      <RouterLink to="/pasteles">Pasteles</RouterLink>
      <RouterLink to="/reporte">Reporte</RouterLink>
    </nav>
  </header>
  <main>
    <RouterView />
  </main>
</template>


<style>
* { 
  box-sizing: border-box; 
}

body { 
  margin: 0; 
  font-family: 'Segoe UI', sans-serif; 
  background: #fff; 
  color: #333; 
}

/* HEADER */
header { 
  background: #d65c33; 
  color: white; 
  padding: 15px 30px; 
}

h1 { 
  margin: 0 0 10px 0; 
}

/* NAVEGACIÓN */
nav { 
  display: flex; 
  gap: 20px; 
}

nav a { 
  color: white; 
  text-decoration: none; 
  padding: 5px 10px; 
  border-radius: 4px; 
}

nav a.router-link-active { 
  background: rgba(255,255,255,0.2); 
}

/* CONTENIDO */
main { 
  padding: 20px 30px; 
}

/* FORMULARIOS */
.form { 
  display: flex; 
  gap: 10px; 
  margin-bottom: 20px; 
  flex-wrap: wrap; 
}

input, select { 
  padding: 6px 10px; 
  border: 1px solid #ccc; 
  border-radius: 4px; 
}

/* BOTONES */
button { 
  padding: 6px 12px; 
  background: #d65c33; 
  color: white; 
  border: none; 
  border-radius: 4px; 
  cursor: pointer; 
  margin-right: 5px; 
  margin-bottom: 5px;
}

button:hover { 
  background: #a8431f; 
}

/* TABLAS */
table { 
  width: 100%; 
  border-collapse: collapse; 
}

th, td { 
  padding: 8px; 
  text-align: left; 
  border-bottom: 1px solid #ddd; 
}

th { 
  background: #f5f5f5; 
}

/* TARJETAS DEL REPORTE */
.card { 
  border: 1px solid #ddd; 
  border-radius: 8px; 
  padding: 15px; 
  margin-bottom: 15px; 
}
</style>