const fs = require( 'fs' );
const path = require( 'path' );

const pkg = require( '../package.json' );
const stylePath = path.join( __dirname, '..', 'style.css' );

let css = fs.readFileSync( stylePath, 'utf8' );
css = css.replace( /^(Version:).*$/m, `$1 ${ pkg.version }` );
fs.writeFileSync( stylePath, css );

console.log( `Version set to ${ pkg.version }` );
