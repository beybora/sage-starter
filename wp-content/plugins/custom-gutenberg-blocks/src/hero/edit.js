import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	PlainText,
	MediaUpload,
	MediaUploadCheck,
	URLInputButton,
} from '@wordpress/block-editor';
import { Button } from '@wordpress/components';
import { Fragment } from '@wordpress/element';

export default function Edit({ attributes, setAttributes }) {
	const { title, description, imageUrl, buttonText, buttonUrl } = attributes;

	return (
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
			{/* Section Title */}
			<div style={{ fontWeight: 'bold', fontSize: '0.9rem', marginBottom: '1rem', color: '#374151' }}>
				Hero Section Settings
			</div>

			{/* Title */}
			<div style={{ marginBottom: '1rem' }}>
				<strong style={{ display: 'block', marginBottom: '0.25rem', fontSize: '0.875rem', color: '#4b5563' }}>
					{__('Title', 'textdomain')}
				</strong>
				<PlainText
					style={{
						border: '1px solid #ccc',
						borderRadius: '0.5rem',
						padding: '0.75rem 1rem',
						fontSize: '1rem',
						width: '100%',
						minHeight: '50px',
						resize: 'none',
						lineHeight: '1.5',
					}}
					value={title}
					onChange={(value) => setAttributes({ title: value })}
					placeholder={__('Enter title...', 'textdomain')}
				/>
			</div>

			{/* Description */}
			<div style={{ marginBottom: '1rem' }}>
				<strong style={{ display: 'block', marginBottom: '0.25rem', fontSize: '0.875rem', color: '#4b5563' }}>
					{__('Description', 'textdomain')}
				</strong>
				<PlainText
					style={{
						border: '1px solid #ccc',
						borderRadius: '0.5rem',
						padding: '0.75rem 1rem',
						fontSize: '1rem',
						width: '100%',
						minHeight: '120px',
						resize: 'none',
						lineHeight: '1.5',
					}}
					value={description}
					onChange={(value) => setAttributes({ description: value })}
					placeholder={__('Enter description...', 'textdomain')}
				/>
			</div>

			{/* Image Upload */}
			<div style={{ marginBottom: '1rem' }}>
				<strong style={{ display: 'block', marginBottom: '0.25rem', fontSize: '0.875rem', color: '#4b5563' }}>
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
										alt="Selected"
										style={{
											marginBottom: '0.5rem',
											borderRadius: '0.5rem',
											maxHeight: '12rem',
											objectFit: 'contain',
											display: 'block',
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
			<div style={{ marginBottom: '1rem' }}>
				<strong style={{ display: 'block', marginBottom: '0.25rem', fontSize: '0.875rem', color: '#4b5563' }}>
					{__('Button Text', 'textdomain')}
				</strong>
				<PlainText
					style={{
						border: '1px solid #ccc',
						borderRadius: '0.5rem',
						padding: '0.75rem 1rem',
						fontSize: '1rem',
						width: '100%',
						minHeight: '50px',
						resize: 'none',
						lineHeight: '1.5',
					}}
					value={buttonText}
					onChange={(value) => setAttributes({ buttonText: value })}
					placeholder={__('e.g. Register', 'textdomain')}
				/>
			</div>

			{/* Button Link */}
			<div>
				<strong style={{ display: 'block', marginBottom: '0.25rem', fontSize: '0.875rem', color: '#4b5563' }}>
					{__('Button Link', 'textdomain')}
				</strong>
				<URLInputButton
					url={buttonUrl}
					onChange={(url) => setAttributes({ buttonUrl: url })}
				/>
			</div>
		</div>
	);
}
