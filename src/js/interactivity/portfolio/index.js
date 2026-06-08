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
	},
	callbacks: {
		isActive() {
			const { termSlug } = getContext();
			return state.activeFilter === termSlug;
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
