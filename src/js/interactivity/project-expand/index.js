import { store, getContext, getElement } from '@wordpress/interactivity';

store( 'pealutz/project-expand', {
    actions: {
        toggle() {
            const context = getContext();
            context.expanded = ! context.expanded;
        },
    },
	 callbacks: {
        init() {
            const context = getContext();
            const { ref } = getElement();
            const content = ref.querySelector( '#project-content' );
            context.isOverflowing = content.scrollHeight > content.clientHeight;
        },
    },
} );