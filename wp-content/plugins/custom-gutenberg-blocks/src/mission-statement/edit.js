import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	PlainText,
	InspectorControls
} from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';

const variantOptions = [
	{ label: 'Light', value: 'light' },
	{ label: 'Dark', value: 'dark' },
	{ label: 'Light Gray', value: 'light-gray' },
	{ label: 'Light Gray', value: 'light-gray' },
];

export default function Edit({ attributes, setAttributes }) {
	const { headline, subline, variant } = attributes;

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Einstellungen', 'textdomain')}>
					<SelectControl
						label={__('Farbvariante', 'textdomain')}
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
				<strong style={{ display: 'block', marginBottom: '0.5rem' }}>
					{__('Headline', 'textdomain')}
				</strong>
				<PlainText
					value={headline}
					onChange={(val) => setAttributes({ headline: val })}
					placeholder={__('Headline eingeben...', 'textdomain')}
					style={{
						border: '1px solid #ccc',
						borderRadius: '0.375rem',
						padding: '0.75rem 1rem',
						marginBottom: '1rem',
						minHeight: '48px',
					}}
				/>

				<strong style={{ display: 'block', marginBottom: '0.5rem' }}>
					{__('Subline (optional)', 'textdomain')}
				</strong>
				<PlainText
					value={subline}
					onChange={(val) => setAttributes({ subline: val })}
					placeholder={__('Subline eingeben...', 'textdomain')}
					style={{
						border: '1px solid #ccc',
						borderRadius: '0.375rem',
						padding: '0.75rem 1rem',
						marginBottom: '1rem',
						minHeight: '48px',
					}}
				/>
			</div>
		</>
	);
}
