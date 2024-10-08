import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

registerBlockType('coontigos/related-posts', {
    edit: () => {
        const blockProps = useBlockProps();
        return (
            <div { ...blockProps }>
                <p>{ __( 'Bloque de posts relacionados (previsualización dinámica en el frontend)', 'coontigos' ) }</p>
            </div>
        );
    }
});