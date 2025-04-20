import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	PlainText,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';

const variantOptions = [
	{ label: 'Light', value: 'light' },
	{ label: 'Dark', value: 'dark' },
	{ label: 'Light Gray', value: 'light-gray' },
];

export default function Edit({ attributes, setAttributes }) {
	const { headline, subheadline, variant } = attributes;

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Einstellungen', 'custom-gutenberg-blocks')}>
					<SelectControl
						label={__('Farbvariante', 'custom-gutenberg-blocks')}
						value={variant}
						options={variantOptions}
						onChange={(val) => setAttributes({ variant: val })}
					/>
				</PanelBody>
			</InspectorControls>

			<div
				{...useBlockProps({
					className: 'editor-box',
					style: {
						border: '1px solid #ccc',
						backgroundColor: '#fafafa',
						borderRadius: '0.5rem',
						padding: '1.5rem',
						marginBottom: '1.5rem',
						boxShadow: '0 1px 3px rgba(0,0,0,0.05)',
					},
				})}
			>
				<div style={{ fontWeight: 'bold', marginBottom: '1rem', fontSize: '0.9rem', color: '#374151' }}>
					Upcoming Events – Block Settings
				</div>

				<PlainText
					value={headline}
					onChange={(val) => setAttributes({ headline: val })}
					placeholder={__('Add a headline…', 'custom-gutenberg-blocks')}
					style={{
						border: '1px solid #ccc',
						borderRadius: '0.375rem',
						padding: '0.75rem 1rem',
						marginBottom: '1rem',
						minHeight: '48px',
						width: '100%',
					}}
				/>

				<PlainText
					value={subheadline}
					onChange={(val) => setAttributes({ subheadline: val })}
					placeholder={__('Add a subheadline…', 'custom-gutenberg-blocks')}
					style={{
						border: '1px solid #ccc',
						borderRadius: '0.375rem',
						padding: '0.75rem 1rem',
						marginBottom: '1rem',
						minHeight: '48px',
						width: '100%',
					}}
				/>
			</div>
		</>
	);
}
