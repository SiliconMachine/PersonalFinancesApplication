<template>
    <app-layout>
        <div v-if="loaded">
            <div class="mt-2 md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 flex items-center w-full sm:text-3xl sm:leading-9 sm:truncate">
                        <img :src="checkingAccount.institution.logo" class="h-8 w-8 mr-2 rounded-full"/> {{ checkingAccount.name }}
                    </h2>
                </div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    <button v-on:click="promptEdit()" class="-ml-px relative cursor-pointer inline-flex items-center px-4 py-3 rounded-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>

                        Edit Account
                    </button>
                </span>
            </div>
        </div>
        <div class="mt-5" v-if="loaded">
            <div class="mt-5">
                <stats
                    :account="checkingAccount"
                    :type="'checking'"
                    :fields="[
                        'current_balance',
                        'amount_spendable',
                        'transactions_changed'
                    ]"/>
                
                <div class="grid grid-cols-2 gap-4 mt-5">
                    <allocations
                        :account="checkingAccount"
                    />
                    <transactions-table
                        :account="checkingAccount"
                        :columns="['amount', 'date', 'name', 'category']"
                        :buttons="['filter', 'add']"/>
                </div>
            </div>
        </div>
        <edit/>
    </app-layout>
</template>

<script>
    import CheckingAccountsAPI from '../../api/checkingAccounts.js';
    import AppLayout from './../../Layouts/AppLayout'
    import Stats from '../../Components/Accounts/Stats.vue';
    import Allocations from '../../Components/Accounts/Allocations.vue';
    import TransactionsTable from '../../Components/Transactions/TransactionsTable.vue';
    import Edit from '../../Components/Accounts/CheckingAccount/Edit.vue';
    import { EventBus } from '../../event-bus.js';

    export default {
        props: ['id'],

        data(){
            return {
                loaded: false,
                checkingAccount: {}
            }
        },

        components: {
            AppLayout,
            Stats,
            Allocations,
            TransactionsTable,
            Edit
        },

        mounted(){
            this.bindEvents();
            this.loadCheckingAccount();
        },

        methods: {
            bindEvents(){
                EventBus.on('checking-account-updated', function(){
                    this.loadCheckingAccount();
                }.bind(this) );
            },

            promptEdit(){
                EventBus.emit('prompt-edit-account', this.checkingAccount);
            },

            loadCheckingAccount(){
                CheckingAccountsAPI.show( this.id )
                    .then( function( response ){
                        this.checkingAccount = response.data;
                        this.loaded = true;
                    }.bind(this) );
            }
        }
    }
</script>