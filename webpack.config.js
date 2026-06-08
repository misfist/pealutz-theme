const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const CopyWebpackPlugin = require( 'copy-webpack-plugin' );
const path = require( 'path' );

const baseConfig = Array.isArray( defaultConfig ) ? defaultConfig[ 0 ] : defaultConfig;

const copyPlugin = new CopyWebpackPlugin( {
	patterns: [
		{
			from: 'src/fonts',
			to: 'fonts',
			noErrorOnMissing: true,
		},
		{
			from: 'src/images',
			to: 'images',
			noErrorOnMissing: true,
		},
		{
			from: 'node_modules/@wordpress/icons/src/library/*.svg',
			to: 'icons/[name][ext]',
			noErrorOnMissing: true,
		},
	],
} );

module.exports = [
	{
		...baseConfig,
		entry: {
			...baseConfig.entry,
			index: [
				path.resolve( __dirname, 'src/index.scss' ),
				path.resolve( __dirname, 'src/index.js' ),
			],
			editor: path.resolve( __dirname, 'src/editor.scss' ),
		},
		plugins: [
			...( baseConfig.plugins || [] ),
			copyPlugin,
		],
	},
	{
		mode: baseConfig.mode,
		entry: {
			interactivity: path.resolve( __dirname, 'src/js/interactivity/index.js' ),
		},
		output: {
			filename: '[name].js',
			path: path.resolve( __dirname, 'build' ),
			library: { type: 'module' },
			clean: false,
		},
		externalsType: 'module',
		externals: {
			'@wordpress/interactivity': '@wordpress/interactivity',
		},
		experiments: {
			outputModule: true,
		},
	},
];
