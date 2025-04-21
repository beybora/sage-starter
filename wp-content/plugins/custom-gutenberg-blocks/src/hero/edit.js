import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	PlainText,
	MediaUpload,
	MediaUploadCheck,
	URLInputButton,
	InspectorControls
} from '@wordpress/block-editor';
import { Button, PanelBody, SelectControl } from '@wordpress/components';
import { Fragment } from '@wordpress/element';

const variantOptions = [
	{ label: 'Light', value: 'light' },
	{ label: 'Dark', value: 'dark' },
	{ label: 'Light Gray', value: 'light-gray' },
];

export default function Edit({ attributes, setAttributes }) {
	const { title, description, imageUrl, buttonText, buttonUrl, variant } = attributes;

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
				{/* Section Label */}
				<div style={{ fontWeight: 'bold', fontSize: '0.9rem', marginBottom: '1.5rem', color: '#374151' }}>
					{__('Hero Section Settings', 'textdomain')}
				</div>

				{/* Title */}
				<PlainText
					style={{
						border: '1px solid #ccc',
						borderRadius: '0.375rem',
						padding: '0.75rem 1rem',
						marginBottom: '1rem',
						minHeight: '48px',
						width: '100%',
					}}
					value={title}
					onChange={(value) => setAttributes({ title: value })}
					placeholder={__('Enter Hero Title…', 'textdomain')}
				/>

				{/* Description */}
				<PlainText
					style={{
						border: '1px solid #ccc',
						borderRadius: '0.5rem',
						padding: '0.75rem 1rem',
						fontSize: '1rem',
						minHeight: '100px',
						marginBottom: '1rem',
					}}
					value={description}
					onChange={(value) => setAttributes({ description: value })}
					placeholder={__('Enter description...', 'textdomain')}
				/>

				{/* Image Upload */}
				<div style={{ marginBottom: '1rem' }}>
					<strong style={{ display: 'block', marginBottom: '0.25rem', fontSize: '0.875rem' }}>
						{__('Image', 'textdomain')}
					</strong>
					<MediaUploadCheck>
						<MediaUpload
							onSelect={(media) => setAttributes({ imageUrl: media.url })}
							allowedTypes={['image']}
							render={({ open }) => (
								<Fragment>
									{imageUrl ? (
										<img
											src={imageUrl}
											alt=""
											style={{
												marginBottom: '0.5rem',
												borderRadius: '0.5rem',
												maxHeight: '12rem',
												objectFit: 'contain',
											}}
										/>
									) : (
										<div
											style={{
												height: '8rem',
												backgroundColor: '#e5e7eb',
												color: '#6b7280',
												borderRadius: '0.5rem',
												display: 'flex',
												alignItems: 'center',
												justifyContent: 'center',
												fontSize: '0.875rem',
												marginBottom: '0.5rem',
											}}
										>
											{__('No image selected', 'textdomain')}
										</div>
									)}
									<Button onClick={open} variant="secondary">
										{__('Select / Replace Image', 'textdomain')}
									</Button>
								</Fragment>
							)}
						/>
					</MediaUploadCheck>
				</div>

				{/* Button Text */}
				<PlainText
					value={buttonText}
					onChange={(value) => setAttributes({ buttonText: value })}
					placeholder={__('Button Text', 'textdomain')}
					style={{
						border: '1px solid #ccc',
						borderRadius: '0.375rem',
						padding: '0.75rem 1rem',
						marginBottom: '1rem',
						minHeight: '48px',
						width: '100%',
					}}
				/>

				{/* Button URL */}
				<URLInputButton
					url={buttonUrl}
					onChange={(url) => setAttributes({ buttonUrl: url })}
				/>
			</div>
		</>
	);
}
