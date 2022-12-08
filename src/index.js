/**
 * WordPress dependencies.
 */
import { registerPlugin } from '@wordpress/plugins';
import { __ } from '@wordpress/i18n';
import { PluginSidebar } from '@wordpress/edit-post';

const TestPlugin = () => {
	return (
		<PluginSidebar
			name="debug-blocks"
			title="Debug"
			icon={ false }
		>
			{ __( 'Testing', 'debugblocks' ) }
		</PluginSidebar>
	);
};

registerPlugin( 'test-plugin', { render: TestPlugin } );
