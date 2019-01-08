package br.com.victorblq.domain.entity.graduation;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.EnumType;
import javax.persistence.Enumerated;
import javax.validation.constraints.NotEmpty;

import br.com.victorblq.domain.entity.AbstractEntity;
import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.NoArgsConstructor;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, Dec 28, 2018
 */
@Data
@Entity
@EqualsAndHashCode(callSuper=true)
@NoArgsConstructor
public class Graduation extends AbstractEntity {

	private static final long serialVersionUID = 2558023408324820050L;

	@NotEmpty
	@Column(length=100, nullable=false)
	private String course;
	
	@NotEmpty
	@Column(length=100, nullable=false)
	private String institute;

	@Column(length=50)
	private String title;
	
	@Enumerated(EnumType.STRING)
	private GraduationStatus status;
	
	@Column(length=10)
	private String period;
}
