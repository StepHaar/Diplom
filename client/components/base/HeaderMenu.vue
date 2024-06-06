<template> 
    <div class="header-menu"> 
        <template v-for="item in data?.header.menu"> 
            <a v-if="item.children" class="header-menu-item dropdown"> 
                <a>{{ item?.label }}</a>
                <ph-caret-down :size="20" class="has-children-icon" /> 
                <ul class="dropdown-menu"> 
                    <template v-for="child in item.children"> 
                        <li><nuxt-link :to="child?.link">{{ child?.label }}</nuxt-link></li> 
                    </template> 
                </ul> 
            </a> 
            <nuxt-link v-else :to="item?.link" class="header-menu-item">{{ item?.label }}</nuxt-link> 
        </template> 

    </div> 
</template> 
 
<script setup> 
import { PhCaretDown } from "@phosphor-icons/vue"; 

const props = defineProps({
    data: null,
});

</script> 
 
<style scoped> 
.header-menu { 
    display: flex; 
} 
 
.header-menu-item { 
    position: relative; 
    padding: 10px 20px; 
    text-decoration: none; 
    color: var(--text); 
    font-size: var(--text_size); 
    margin-right: 20px; 
    white-space: nowrap; 
} 
.normal .header-menu-item:hover { 
    color: var(--light-accent) 
}

.header-menu-item:first-child { 
    margin-right: 40px;  
} 

.header-menu-item:last-child { 
    margin-right: 0;  
} 
 
.dropdown-menu { 
    opacity: 0;
    scale: 0.5;
    pointer-events: none;
    position: absolute; 
    background-color: var(--bg); 
    min-width: 360px; 
    padding: 20px; 
    border-radius: 20px; 
    z-index: 1; 
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); 
    right: 0;  
    transition: .5s ease;
    transform-origin: top right;
    will-change: transform; 
  
} 
 
.dropdown:hover .dropdown-menu { 
    opacity: 1;
    scale: 1;
    pointer-events: all;
} 
 
.dropdown-menu li { 
    display: block; 
    margin-bottom: 10px; 
} 
 
.dropdown-menu li:last-child { 
    margin-bottom: 0; 
} 
 
.dropdown-menu li a { 
    padding: 10px 15px; 
    font-size: var(--text_size); 
    color: var(--text); 
    text-decoration: none; 
} 
 
.normal .dropdown-menu li a:hover { 
    color: var(--accent) 
} 
 
.has-children-icon { 
    margin: 0 10px;
    position: absolute; 
    top: 50%; 
    transform: translateY(-50%); 
    transition: transform 0.8s ease;
} 
 
.normal .dropdown:hover .has-children-icon { 
    color: var(--light-accent);
    transform: translateY(-50%) rotate(-180deg);
} 

@media screen and (max-width:1200px) {
    .header-menu{
        display: none;
    }
}
</style>