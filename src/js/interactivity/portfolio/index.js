import { store, getContext, getElement } from '@wordpress/interactivity';

const { state, helpers, actions } = store( 'pealutz/portfolio', {
	state: {
		activeFilter: '',
	},
	helpers: {
		getQueryVar( name = 'project-tag' ) {
			const params = new URLSearchParams( window.location.search );
			return params.get( name ) || '';
		},
	},
	actions: {
		setFilter( event ) {
			event.preventDefault();
			const { termSlug } = getContext();
			state.activeFilter = state.activeFilter === termSlug ? '' : termSlug;
			actions.setQueryVar( state.activeFilter );
		},
		resetFilter( event ) {
			event.preventDefault();
			state.activeFilter = '';
			actions.setQueryVar( '' );
		},
		setQueryVar( value, name = 'project-tag' ) {
			const currentVar = helpers.getQueryVar( name );

			if ( currentVar === value ) {
				return;
			}

			const url = new URL( window.location.href );

			if ( value ) {
				url.searchParams.set( name, value );
			} else {
				url.searchParams.delete( name );
			}

			window.history.replaceState( {}, '', url );
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

			const { projectTags } = getContext();
			return ! projectTags.includes( state.activeFilter );
		},
	},
} );

state.activeFilter = helpers.getQueryVar();
