import { store, getContext, getElement } from '@wordpress/interactivity';

const { state } = store( 'pealutz/portfolio', {
	state: {
		activeFilter: '',
	},
	actions: {
		setFilter( event ) {
			event.preventDefault();
			const { termSlug } = getContext();
			state.activeFilter = state.activeFilter === termSlug ? '' : termSlug;
		},
		resetFilter( event ) {
			event.preventDefault();
			state.activeFilter = '';
		},
	},
	callbacks: {
		isActive() {
			const { termSlug } = getContext();
			return state.activeFilter === termSlug;
		},
		isAllActive() {
			return state.activeFilter === '';
		},
		isHidden() {
if ( ! state.activeFilter ) {
				return false;
			}
			const { ref } = getElement();
			return ! ref.classList.contains( `project_tag-${ state.activeFilter }` );
		},
	},
} );
