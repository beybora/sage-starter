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
	const {
		title,
		description,
		address,
		email,
		phone,
		mapEmbed,
		variant,
	} = attributes;

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
				<div style={{ fontWeight: 'bold', fontSize: '0.9rem', marginBottom: '1.5rem', color: '#374151' }}>
					{__('Contact Section Settings', 'textdomain')}
				</div>

				<PlainText
					value={title}
					onChange={(val) => setAttributes({ title: val })}
					placeholder={__('Title...', 'textdomain')}
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
					value={description}
					onChange={(val) => setAttributes({ description: val })}
					placeholder={__('Description...', 'textdomain')}
					style={{
						border: '1px solid #ccc',
						borderRadius: '0.375rem',
						padding: '0.75rem 1rem',
						marginBottom: '1rem',
						minHeight: '64px',
						width: '100%',
					}}
				/>

				<PlainText
					value={address}
					onChange={(val) => setAttributes({ address: val })}
					placeholder={__('Address...', 'textdomain')}
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
					value={email}
					onChange={(val) => setAttributes({ email: val })}
					placeholder={__('Email...', 'textdomain')}
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
					value={phone}
					onChange={(val) => setAttributes({ phone: val })}
					placeholder={__('Phone...', 'textdomain')}
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
					value={mapEmbed}
					onChange={(val) => setAttributes({ mapEmbed: val })}
					placeholder={__('Google Maps iframe Embed Code...', 'textdomain')}
					style={{
						border: '1px solid #ccc',
						borderRadius: '0.375rem',
						padding: '0.75rem 1rem',
						marginBottom: '1rem',
						minHeight: '64px',
						width: '100%',
					}}
				/>
			</div>
		</>
	);
}
