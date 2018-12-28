package br.com.victorblq.domain.entity.personal_info;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.ManyToOne;
import javax.validation.constraints.NotEmpty;
import javax.validation.constraints.NotNull;

import com.fasterxml.jackson.annotation.JsonIgnore;

import br.com.victorblq.domain.entity.AbstractEntity;
import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.NoArgsConstructor;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, 12/26/2018
 */
@Data
@Entity
@EqualsAndHashCode(callSuper=true)
@NoArgsConstructor
public class Email extends AbstractEntity{

	private static final long serialVersionUID = -1203485418453920742L;

	@NotEmpty
	@Column(length=50, nullable=false)
	private String address;
	
	@NotNull
	@JsonIgnore
	@ManyToOne(optional=false)
	private PersonalInfo personalInfo;
}
