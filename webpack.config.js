const path = require( 'path' );
const wpScriptsConfig = require( '@wordpress/scripts/config/webpack.config' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const RemoveEmptyScriptsPlugin = require( 'webpack-remove-empty-scripts' );
const glob = require( 'glob' );
const plugins = wpScriptsConfig.plugins.filter( ( item ) => {
	return ! [ 'MiniCssExtractPlugin' ].includes( item.constructor.name );
} );

const blocks = {
	...wpScriptsConfig,
	entry: glob.sync( 'src/styles/blocks/**/*.scss' ).reduce( function (
		obj,
		el
	) {
		const entryName =
			path.parse( el ).dir.replace( 'src/styles/', '' ) +
			'/' +
			path.parse( el ).name;
		obj[ entryName ] = path.resolve( __dirname, el );
		return obj;
	}, {} ),
	output: {
		path: path.resolve( __dirname, 'build/styles' ),
		filename: '[name].js',
	},
	plugins: [
		...plugins,
		new RemoveEmptyScriptsPlugin(),
		new MiniCssExtractPlugin( { filename: '[name].css' } ),
	],
};

const assets = {
	...wpScriptsConfig,
	entry: {
		frontend: [
			path.resolve( __dirname, 'src/scripts', 'frontend.tsx' ),
			path.resolve( __dirname, 'src/styles', 'frontend.scss' ),
		],
		editor: [
			path.resolve( __dirname, 'src/scripts', 'editor.tsx' ),
			path.resolve( __dirname, 'src/styles', 'editor.scss' ),
		],
	},
	output: {
		path: path.resolve( __dirname, 'build' ),
		filename: 'scripts/[name].bundle.js',
	},
	devServer: {
		devMiddleware: {
			writeToDisk: true,
		},
		allowedHosts: 'auto',
		host: 'localhost',
		port: 'auto',
		proxy: {
			'/build': {
				pathRewrite: {
					'^/build': '',
				},
			},
		},
	},
	plugins: [
		...plugins,
		new RemoveEmptyScriptsPlugin(),
		new MiniCssExtractPlugin( { filename: 'styles/[name].bundle.css' } ),
	],
};

module.exports = () => {
	return [ assets, blocks ];
};
