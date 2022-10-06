
<template>
    <div class="header-right w-lg-max ml-0 ml-lg-auto">
        <div class="header-contact d-none d-lg-flex align-items-center ml-auto pr-xl-4 mr-4">
        </div><!-- End .header-contact -->
        
        <a  v-if="!$root.loggedIn" href="/login" class="header-icon pl-1"><i class="icon-user-2"></i></a>

        <div v-if="$root.loggedIn" class="header-dropdown ml-4">
            <a href="/acoount" class="header-icon  pl-1"><i class="icon-user-2"></i></a>
        </div>

        
    </div>

</template>
<script>

import { mapGetters,mapActions } from 'vuex'
import DropDown from '../cart/DropDown'

export default {
    data(){
        return {
          user:Window.auth,
          token:null
        } 
    },
    components:{
        DropDown,
    },
    computed:{
        ...mapGetters({
            cartItemCount:'cartItemCount',
            wishlistCount:'wishlistCount'
        })
    } ,
    created(){
       this.getWislist()
       let token = document.head.querySelector('meta[name="csrf-token"]');
       this.token = token.content
    },
    methods:{
        ...mapActions({
             getWislist:'getWislist',
        })
    }
}
</script>