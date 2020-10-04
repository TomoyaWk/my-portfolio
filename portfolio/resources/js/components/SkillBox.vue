<template>
    
        <div class="p-5 border-green-600 border-2 w-50">
            <h1 class="font-sans font-bold text-2xl text-black">{{ category }}</h1>
            <ul>
                <li v-for="sk in skills" :key='sk'>{{ sk }}</li>
            </ul>

            <div v-if="isFw">
                <h1 class="font-sans font-bold text-2xl text-black">frameworks/library</h1>
                <ul>
                    <li v-for="fw in frameworks" :key='fw'>{{ fw }}</li>
                </ul>
            </div>
            
        </div>
</template>

<script>
export default {
    props:[
        'category',
        'skills',
        'frameworks',
    ],
    computed:{
        isFw(){
            return typeof this.frameworks !== 'undefined';
        }
    }
}
</script>