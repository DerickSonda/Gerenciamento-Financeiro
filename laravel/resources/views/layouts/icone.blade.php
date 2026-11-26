<svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    @switch($nome)
        @case('inicio')
            <path d="m3 11 9-8 9 8"/><path d="M5 10v10h14V10"/><path d="M9 20v-6h6v6"/>
            @break
        @case('movimentos')
            <path d="M6 3v18l3-2 3 2 3-2 3 2V3l-3 2-3-2-3 2Z"/><path d="M9 10h6M9 14h5"/>
            @break
        @case('planejar')
            <circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/>
            @break
        @case('perfil')
            <circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/>
            @break
    @endswitch
</svg>
