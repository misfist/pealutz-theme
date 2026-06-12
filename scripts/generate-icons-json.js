const fs = require( 'fs' );
const path = require( 'path' );

const iconsDir = path.resolve( __dirname, '../build/icons' );
const outputFile = path.resolve( __dirname, '../build/icons.json' );

const files = fs.readdirSync( iconsDir ).filter( ( f ) => f.endsWith( '.svg' ) );

const icons = {};
files.forEach( ( file ) => {
	const name = path.basename( file, '.svg' );
	const label = name
		.split( '-' )
		.map( ( word ) => word.charAt( 0 ).toUpperCase() + word.slice( 1 ) )
		.join( ' ' );
	icons[ name ] = label;
} );

fs.writeFileSync( outputFile, JSON.stringify( icons, null, '\t' ) );
console.log( `Generated icons.json with ${ Object.keys( icons ).length } icons.` );
