import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	PlainText,
	InspectorControls,
} from '@wordpress/block-editor';
import { Button, PanelBody, SelectControl } from '@wordpress/components';
import { Fragment } from '@wordpress/element';

const variantOptions = [
	{ label: 'Light', value: 'light' },
	{ label: 'Dark', value: 'dark' },
];

export default function Edit({ attributes, setAttributes }) {
	const { title, subtitle, cards = [], variant = 'light' } = attributes;

	const updateCard = (index, field, value) => {
		const updated = [...cards];
		updated[index][field] = value;
		setAttributes({ cards: updated });
	};

	const addCard = () => {
		if (cards.length >= 4) return;
		setAttributes({
			cards: [...cards, { title: '', description: '' }],
		});
	};

	const removeCard = (index) => {
		const updated = cards.filter((_, i) => i !== index);
		setAttributes({ cards: updated });
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title="Einstellungen">
					<SelectControl
						label="Farbvariante"
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
				{/* Title */}
				<strong>{__('Section Title', 'textdomain')}</strong>
				<PlainText
					value={title}
					onChange={(value) => setAttributes({ title: value })}
					placeholder={__('Add title...', 'textdomain')}
				/>

				{/* Subtitle */}
				<strong className="mt-3">{__('Section Subtitle', 'textdomain')}</strong>
				<PlainText
					value={subtitle}
					onChange={(value) => setAttributes({ subtitle: value })}
					placeholder={__('Add subtitle...', 'textdomain')}
				/>

				{/* Cards */}
				{cards.map((card, index) => (
					<div key={index} style={{ marginTop: '1rem' }}>
						<strong>{__('Item Title', 'textdomain')}</strong>
						<PlainText
							value={card.title}
							onChange={(value) => updateCard(index, 'title', value)}
							placeholder={__('Item title...', 'textdomain')}
						/>
						<strong>{__('Item Text', 'textdomain')}</strong>
						<PlainText
							value={card.description}
							onChange={(value) => updateCard(index, 'description', value)}
							placeholder={__('Item text...', 'textdomain')}
						/>
						<Button
							variant="secondary"
							onClick={() => removeCard(index)}
							style={{ marginTop: '0.5rem' }}
						>
							{__('Remove', 'textdomain')}
						</Button>
					</div>
				))}

				{cards.length < 4 && (
					<Button variant="primary" onClick={addCard} style={{ marginTop: '1rem' }}>
						{__('Add Item', 'textdomain')}
					</Button>
				)}
			</div>
		</>
	);
}
